<?php
/**
 * File :        NotImplementedException.php
 * Location :    gsb_prospects/src/kernel/NotImplementedException.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\kernel;

/**
 * Class NotImplementedException
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class NotImplementedException extends AbstractException
{
    /**
     * Constructeur
     *
     * @param string $message  message
     * @param int    $code     code
     * @param object $previous previous exception
     */
    public function __construct($message = "", $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous);
        if (empty($message)) {
            $this->message = "This function is not yet implemented.";
        }
    }
}
