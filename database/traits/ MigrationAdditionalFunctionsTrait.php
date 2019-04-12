<?php

use Illuminate\Database\Schema\Blueprint;

trait MigrationAdditionalFunctionsTrait
{
    /**
     * Get jsonable column data type.
     *
     * @return string
     * @author lloricode@gmail.com
     */
    protected function jsonable(): string
    {
        return is_latest_mysql_version() ? 'json' : 'text';
    }

    /**
     * Give constraint
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @param string                                $column
     * @param string                                $foreignTableName
     * @param string                                $onDelete
     *
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    protected function foreignConstraint(
        Blueprint $table,
        string $column,
        string $foreignTableName,
        string $onDelete = 'cascade'
    ) {
//        if (is_null($foreignTableName)) {
//            return $table
//                ->integer($column)
//                ->unsigned();
//        }

        $tbl = $table
            ->integer($column)
            ->unsigned();
        $table->foreign($column)
            ->references('id')
            ->on($foreignTableName)
            ->onDelete($onDelete);

        return $tbl;
    }
}
