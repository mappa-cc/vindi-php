<?php namespace Vindi\Exceptions;

class ValidationException extends RequestException
{
    /**
     * ValidationException constructor.
     *
     * @param int   $status
     * @param mixed $errors
     */
    public function __construct($status, $errors, array $lastOptions = [])
    {
        parent::__construct($status, $errors, $lastOptions);

        $this->message = 'Erros de validação foram encontrados!';
        if(isset($errors[0]->parameter) && isset($errors[0]->message)) {
            $this->message = $errors[0]->parameter . ': ' . $errors[0]->message;
        }
    }
}
