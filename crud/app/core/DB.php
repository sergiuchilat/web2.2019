<?php
/**
 * Класс для работы с СУБД MySQL
 */
class DB
{
    private $errors = [
        1062 => 'RECORD_EXISTS'
    ];
    /**
     * @var null|mysqli хранит объект, представляющий собой подключение к БД
     */
    public $connection;

    private $running;
    /**
     * Функция открывающая соединение с БД.
     *
     * @param $dbServer   string адрес сервера БД.
     * @param $dbUsername string логин к БД.
     * @param $dbPassword string пароль к БД.
     * @param $dbName     string имя БД.
     * @param $dbEncoding string кодировка БД.
     *
     * @return mysqli|null объект подключения к БД
     */
    public function open($dbServer, $dbUsername, $dbPassword, $dbName, $dbEncoding)
    {
        $this->connection = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
        if (!$this->connection) {
            die(mysqli_connect_error());
        }
        mysqli_query($this->connection, 'SET character_set_client = ' . $dbEncoding);
        mysqli_query($this->connection, 'SET character_set_connection = ' . $dbEncoding);
        mysqli_query($this->connection, 'SET character_set_results = ' . $dbEncoding);

        return $this->connection;
    }

    public function beginTransaction()
    {
        if ($this->running) {
            throw new Exception('Transaction already running');
        }

        $this->running = $this->connection->begin_transaction();
    }
    /**
     * Check if there's a transaction running.
     */
    private function checkTransaction()
    {
        return $this->running;
    }
    /**
     * Reset the transaction.
     */
    protected function reset()
    {
        $this->running = false;
    }

    public function commit()
    {
        if (!$this->connection->commit()) {
            throw new Exception('Transaction commit error');
        }

        $this->reset();
    }

    public function rollback()
    {
        $this->connection->rollback();
        $this->reset();
    }

    /**
     * @param string $q
     * @param string $key
     *
     * @return Generator|array
     */
    public function selectWithIteration($q = '', $key = 'id')
    {
        if ($q != '') {
            $result = $this->executeQuery($q);
            if ($result === false) {
                return [];
            }
            if (mysqli_num_rows($result)) {
                while ($r = mysqli_fetch_assoc($result)) {
                    if (!empty($key) && isset($r[$key])) {
                        yield $r[$key] => $r;
                    } else {
                        yield $r;
                    }
                }
            }
        }

        return [];
    }

    /**
     * Функция выполнения запроса
     *
     * @param string $q запрос
     * @param string $queryType
     *
     * @return bool|mysqli_result результат выполнения запроса
     */
    public function executeQuery($q, $queryType = 'select')
    {
        return mysqli_query($this->connection, $q);

        return $result;
    }

    /**
     * Запрос на выборку одной записи из Базы данных.
     *
     * @param string $q   запрос к БД.
     * @param string $key поле из БД которое будет использовано в качестве ключа массива.
     *
     * @return array массив результатами запроса.
     */
    public function selectOne($q = '', $key = 'id')
    {
        return @array_shift($this->select($q, $key));
    }

    /**
     * Запрос на выборку из Базы данных.
     *
     * @param string $q   запрос к БД.
     * @param string $key поле из БД которое будет использовано в качестве ключа массива.
     *
     * @return array массив результатами запроса.
     */
    public function select($q = '', $key = 'id'): array
    {
        if ($q == '') {
            return [];
        }

        $result = $this->executeQuery($q);
        if ($result === false) {
            return [];
        }

        $list = [];
        if (mysqli_num_rows($result)) {
            while ($r = mysqli_fetch_assoc($result)) {
                if (!empty($key) && isset($r[$key])) {
                    $list[$r[$key]] = $r;
                } else {
                    $list[] = $r;
                }
            }
        }

        return $list;
    }

    /**
     * Запрос на вставку в Базу данных.
     *
     * @param string $q запрос к БД.
     *
     * @return int|string ID новой записи или 0, либо кол-во затронутых записей.
     * @throws Exception
     */
    public function insert($q = '')
    {
        if ($this->executeQuery($q, 'insert')) {
            $lastID = mysqli_insert_id($this->connection);
            if ((int)$lastID) {
                return $lastID;
            }
            return mysqli_affected_rows($this->connection);
        }

        if ($this->checkTransaction()) {
            $error = mysqli_errno($this->connection);
            $this->rollback();
            throw new Exception($this->errors[$error] ?: $error);
        }

        return 0;
    }

    /**
     * Запрос на вставку в Базу данных.
     *
     * @param string $tableName - название таблицы из БДФ.
     * @param array  $dataArray - массив данных, которые передаются в запрос
     * @param int    $debug     режим дебага (0 - off, 1 - on).
     *
     * @return int|string ID новой записи или 0, либо кол-во затронутых записей.
     */
    public function insertSafe($tableName, $dataArray, $debug = 0)
    {//вставка
        // Собираем запрос
        $q = '
            INSERT INTO ' . $tableName . ' (' . implode(', ', array_keys($dataArray)) . ')
            VALUES 
                (' . rtrim(str_repeat('?,', count($dataArray)), ',') . ')';// генерируем строку вида (?,?,?,?), где "?" - ячейка для параметра

        // на случай debug режима
        if ($debug) {
            echo $q;
        }

        if ($this->executeParametricQuery($q, $dataArray)) {
            $lastID = mysqli_insert_id($this->connection);
            if ((int)$lastID) {
                return $lastID;
            }

            return mysqli_affected_rows($this->connection);
        }

        return 0;
    }

    /**
     * Функция выполнения запроса
     *
     * @param string $query  -  запрос
     * @param array  $fields -  массив данных, который будет передаваться в запрос
     *
     * @return bool|mysqli_result результат выполнения запроса
     */
    public function executeParametricQuery($query, $fields)
    {
        $instance = QueryPanel::getInstance();
        $instance->startQueryTimer();//засекаем время

        // Подготавливаем запрос
        $preparedQuery = $this->connection->prepare($query);

        // Формируем параметр передающий типы значений массива
        // s - string, i - integer, d - double, [ b -  blob ]
        $fieldsTypes = '';
        foreach ($fields as $field) {
            if (is_float($field)) {
                $fieldsTypes .= 'd';
            } elseif (is_numeric($field)) {
                $fieldsTypes .= 'i';
            } else {
                $fieldsTypes .= 's';
            }
        }


        // Помещаем строку, которая содержит типы данных каждого поля в массив с данными,
        // чтобы потом использовать как параметр в вызове функции bind_param
        array_unshift($fields, $fieldsTypes);

        // Создаём массив с ссылками на массив данных
        // параметры должны быть ссылками, так как могут быть изменены после bind_params, но до execute
        //      пример -> множественная вставка
        $refs = [];
        foreach ($fields as $key => $value) {
            $refs[$key] = &$fields[$key];
        }

        // Привязываем все параметры запроса, call_user_func_array позволяет передать неопределённое кол-во параметров
        // call_user_func_array - вызывает $preparedQuery->bind_param с аргументами, которые хранятся в $refs
        call_user_func_array([$preparedQuery, "bind_param"], $refs); // $refs распаковывается как параметры bind_params

        // Выполняем запрос
        $result = $preparedQuery->execute();

        $instance->stopQueryTimer('select');//засекаем время
        $instance->logQuery($query, mysqli_num_rows($result), $this->connection->error);

        return $result;
    }

    /**
     * Запрос на обновление записи в Базе данных.
     *
     * @param string $q запрос к БД.
     *
     * @return int кол-во затронутых записей или -1.
     * @throws Exception
     */
    public function update($q = ''): int
    {
        if ($this->executeQuery($q, 'update')) {
            return mysqli_affected_rows($this->connection);
        }

        if ($this->checkTransaction()) {
            $error = mysqli_errno($this->connection);
            $this->rollback();
            throw new Exception($this->errors[$error] ?: $error);
        }

        return -1;
    }

    /**
     * Запрос на удаление записей в Базе данных.
     *
     * @param string $q запрос к БД.
     *
     * @return int кол-во затронутых записей или -1.
     * @throws Exception
     */
    public function delete($q = ''): int
    {
        if ($this->executeQuery($q, 'delete')) {
            //возвращает результат выполнения запроса и количество удаленных рядов
            return mysqli_errno($this->connection) == 1451 ? -2 : mysqli_affected_rows($this->connection);
        }

        if ($this->checkTransaction()) {

            $error = mysqli_errno($this->connection);
            $this->rollback();
            throw new Exception($this->errors[$error] ?: $error);
        }

        return -1;
    }

    /**
     *Функция закрытия текущего соединения с базой данных.
     */
    public function close()
    {
        mysqli_close($this->connection);
    }

}
