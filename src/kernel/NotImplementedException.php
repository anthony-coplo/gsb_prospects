<?php
namespace gsb_prospects\kernel;

final class NotImplementedException extends AbstractException {

    public function __construct($message = "", $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous);
        if(empty($message)) {
            $this->message = "This function is not yet implemented.";
        }
    }
}
