<?php

abstract class Model
{
    protected const TABLE_NAME = '';

    public static function all()
    {
        return 'SELECT * FROM ' . static::TABLE_NAME;
    }
}

class User extends Model
{
    protected const TABLE_NAME = 'users';
}

class Role extends Model
{
    protected const TABLE_NAME = 'roles';
}

echo User::all();
echo Role::all();

///lets look at late static binding below

class Model
{
    protected static $tablename = 'Model';

    public static function getTableName()
    {
        return static::$tablename;
    }
}

class User extends Model
{
    protected static $tablename = "User";
}

echo User::getTableName();