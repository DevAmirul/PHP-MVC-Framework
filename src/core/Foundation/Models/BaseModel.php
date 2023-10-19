<?php

namespace Devamirul\PhpMicro\core\Foundation\Models;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\DB;
use Devamirul\PhpMicro\core\Foundation\Models\Traits\ModelDebug;
use Devamirul\PhpMicro\core\Foundation\Models\Traits\ModelQuery;
use Medoo\Medoo;

class BaseModel {
    use ModelQuery, ModelDebug;

    /**
     * Table name
     */
    public $table;

    /**
     * Store query data.
     */
    public mixed $data;

    /**
     * Store DB instance.
     */
    public Medoo $db;

    public function __construct() {
        $this->db = DB::db();

        $this->getTableName();
    }

    /**
     * When the model is called it will extract the table name from the model.
     */
    public function getTableName(): void {
        if (!$this->table) {
            $explodedClassName = explode("\\", get_called_class());
            $this->table       = strtolower($explodedClassName[array_key_last($explodedClassName)]);
        }
    }

    /**
     * Get query data in json format.
     */
    public function getJson(string $wrap = null): static {
        if ($wrap) {
            $this->data = json_encode([$wrap => $this->data]);
        } else {
            $this->data = json_encode($this->data);
        }
        return $this;
    }

    /**
     * Get query Data.
     */
    public function getData(): mixed {
        return $this->data;
    }
}
