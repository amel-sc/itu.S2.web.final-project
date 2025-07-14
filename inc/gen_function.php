
<?php 
//function update table
    function update_table($table, $column, $condition)
    {
        $sql = 'UPDATE %s SET ';
        $sql = sprintf($sql, $table);
        // set values
        for ($i = 0; $i < count($column); $i++)
        {
            if ($i == count($column) - 1)
            {
                $sql = $sql . $column[$i]['key'] . ' = "' . $column[$i]['value'] . '"';
            }
            else
            {
                $sql = $sql . $column[$i]['key'] . ' = "' . $column[$i]['value'] . '", ';
            }
        }
        // set condition
        $sql = $sql . ' WHERE ';
        for ($i = 0; $i < count($condition); $i++)
        {
            if ($i == count($condition) - 1)
            {
                $sql = $sql . $condition[$i]['key'] . ' = "' . $condition[$i]['value'] . '"';
            }
            else
            {
                $sql = $sql . $condition[$i]['key'] . ' = "' . $condition[$i]['value'] . '" and ';
            }
        }
        // execute the request
        $query = mysqli_query(dbconnect(), $sql);

        return $sql;
    }

    //function to insert into table
    function insert_table($table, $column)
    {
        $sql = 'insert into %s (';
        $sql = sprintf($sql, $table);
        // set column
        for ($i = 0; $i < count($column); $i++)
        {
            if ($i == count($column) - 1)
            {
                $sql = $sql . $column[$i]['key'] . ')';
            }
            else
            {
                $sql = $sql . $column[$i]['key'] . ', ';
            }
        }
        // set values
        $sql = $sql . ' values (';
        for ($i = 0; $i < count($column); $i++)
        {
            if ($i == count($column) - 1)
            {
                $sql = $sql . '"' . $column[$i]['value'] . '")';
            }
            else
            {
                $sql = $sql . '"' . $column[$i]['value'] . '", ';
            }
        }
        // execute the request
        $query = mysqli_query(dbconnect(), $sql);
            
        return $sql;
    }

    // function to select table
    function select_table($table, $condition, $other_condition)
    {
        $sql = 'SELECT * FROM %s ';
        $sql = sprintf($sql, $table);
        // set condition
        if ($condition != null)
        {
            $sql = $sql . ' WHERE ';
            for ($i = 0; $i < count($condition); $i++)
            {
                if ($i == count($condition) - 1)
                {
                    $sql = $sql . $condition[$i]['key'] . ' = "' . $condition[$i]['value'] . '"';
                }
                else
                {
                    $sql = $sql . $condition[$i]['key'] . ' = "' . $condition[$i]['value'] . '" AND ';
                }
            }
        }
        // set other condition
        if ($other_condition != null)
        {
            for ($i = 0; $i < count($other_condition); $i++)
            {
                $sql = $sql . ' ' . $other_condition[$i]. ' ';
            }
        }
        // execute the request
        $result = array_query($sql);

        return $result;
    }
    function count_request_result($sql)
    {
        $query = mysqli_query(dbconnect(), $sql);
        $result = mysqli_num_rows($query);
        mysqli_free_result($query);
        
        return $result;
    }
    // function to return the array result of a query (if the query return an array not one value)
    function array_query($sql)
    {
        $query = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        mysqli_free_result($query);

        return $result;
    }
    //function to return one value of a query (if the query return one value)
    function one_query($sql)
    {
        $query = mysqli_query(dbconnect(), $sql);
        $result = mysqli_fetch_assoc($query);
        mysqli_free_result($query);

        return $result;
    }


?>
