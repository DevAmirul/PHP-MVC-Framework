<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Redirect;

use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;

class Redirect {

    private string $redirectLink;

    public function redirect(string $redirectLink): static {
        $this->redirectLink = $redirectLink;
        return $this;
    }

    public function back(): static {
        $this->redirectLink = $_SERVER['HTTP_REFERER'];
        return $this;
    }

    public function withError(mixed $errors): static {
        FlushMessage::singleton()->set('errors', $errors);
        return $this;
    }

    public function withData(mixed $data): static {
        FlushMessage::singleton()->set('data', $data);
        return $this;
    }

    public function __destruct() {
        header('Location: ' . $this->redirectLink);
    }
}
