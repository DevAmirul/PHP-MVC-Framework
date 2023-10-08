<?php

namespace Devamirul\PhpMicro\core\Foundation\Models;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\DB;
use Devamirul\PhpMicro\core\Foundation\Models\Traits\ModelDebug;
use Devamirul\PhpMicro\core\Foundation\Models\Traits\ModelQuery;
use Medoo\Medoo;

class BaseModel {
    use ModelQuery, ModelDebug;

    public $table;
    public mixed $data;
    public Medoo $db;

    public function __construct() {
        $this->db = DB::db();

        $this->getTableName();
    }

    public function getTableName() {
        if (!$this->table) {
            $explodedClassName = explode("\\", get_called_class());
            $this->table       = strtolower($explodedClassName[array_key_last($explodedClassName)]);
        }
    }

    public function getJson(string $wrap = null): static {
        if ($wrap) {
            $this->data = json_encode([$wrap => $this->data]);
        } else {
            $this->data = json_encode($this->data);
        }
        return $this;
    }

    public function getData(): mixed {
        return $this->data;
    }

}
