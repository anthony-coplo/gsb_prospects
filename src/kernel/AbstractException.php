<?php
namespace gsb_prospects\kernel;

use \Exception;

abstract class AbstractException extends Exception implements IException
{
    protected $message = "Unknown exception";     // Exception message
    private   $string;                            // Unknown
    protected $code    = 0;                       // User-defined exception code
    protected $file;                              // Source filename of exception
    protected $line;                              // Source line of exception
    private   $trace;                             // Unknown

    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        if (empty($message)) {
            throw new $this('Unknown '. get_class($this));
        }
    }
    
    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
                                . "{$this->getTraceAsString()}";
    }
}
