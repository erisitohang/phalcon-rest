<?php
use Phalcon\Db\Dialect\MySQL as SqlDialect;
$dialect = new SqlDialect();

$dialect->registerCustomFunction(
    'MATCH_AGAINST',
    function ($dialect, $expression) {
        $arguments = $expression['arguments'];
        return sprintf(
            ' MATCH (%s) AGAINST (%)',
            $dialect->getSqlExpression($arguments[0]),
            $dialect->getSqlExpression($arguments[1])
        );
    }
);

return [
    'adapter'  => getenv('DB_ADAPTER'),
    'host'     => getenv('DB_HOST'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'dbname'   => getenv('DB_NAME'),
    'dialectClass'  => $dialect,
];
