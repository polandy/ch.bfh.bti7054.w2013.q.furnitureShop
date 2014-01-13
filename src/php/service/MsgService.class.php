<?php

namespace service;
use model\Furniture;
use model\generic\GenericModel;
use model\generic\GenericNamedModel;

/**
 * Class MessageService
 * @package service
 * Service Layer for Messages
 */
class MsgService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return instance of the MsgService
     */
    public static function getInstance()
    {
        if (is_null(static::$instance) || !static::$instance instanceof MsgService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @param $model or key
     * @return label in appropriate language, if no label has been found, key is returned
     */
    public function getName($model)
    {
        $lang = \Config::getInstance()->language;
        if ($model instanceof GenericNamedModel) {
            if ($lang == 'en') {
                return $model->getNameEn();
            }
            if ($lang == 'de') {
                return $model->getNameDe();
            }
        } elseif ($model == null) {
            return "-";
        } else {
            $messages = \Messages::getInstance()->getMessages();
            if (!empty($messages)) {
                $msg = $messages[$model][$lang == 'de' ? 0 : 1];
                return $msg;
            }
        }
    }

    /**
     * @param $furniture
     * @return description in appropriate language
     */
    public function getDescription($furniture)
    {
        $lang = \Config::getInstance()->language;
        if ($furniture instanceof Furniture) {
            if ($lang == 'en') {
                return $furniture->getDescriptionEn();
            }
            if ($lang == 'de') {
                return $furniture->getDescriptionDe();
            }
        }
    }

    /**
     * delegates to getName
     */
    public function getMsg($key)
    {
        return $this->getName($key);
    }

    /**
     * @param $key of the message
     * @return string styled
     */
    public function getErrorMsg($key)
    {
        return '<span class="alert-box alert">' . $key . '</span>';
    }

    /**
     * renders a errorMessage
     * @param $key of the message
     */
    public function renderErrorMsg($key)
    {
        echo $this->getErrorMsg($key);
    }

    /**
     * @param $key of the message
     * @return string styled
     */
    public function getSuccessMsg($key)
    {
        return '<span class="success label">' . $this->getName($key) . '</span>';
    }

    public function renderMsg($key)
    {
        echo $this->getName($key);
    }

    /**
     * renders a successMessage
     * @param $key of the message
     */
    public function renderSuccessMsg($key)
    {
        echo $this->getSuccessMsg($key);
    }

}