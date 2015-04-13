<?php
namespace phubb;

class Logger extends \Psr\Log\AbstractLogger
{
    protected $ml;

    public function __construct()
    {
        $this->ml = new \Monolog\Logger('phubb');
        $this->ml->pushHandler(
            new \Monolog\Handler\StreamHandler(
                __DIR__ . '/../../phubb.log', \Monolog\Logger::DEBUG
            )
        );
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $this->ml->log($level, $message, $context);
    }
}
?>
