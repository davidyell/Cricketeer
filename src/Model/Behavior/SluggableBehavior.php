<?php

namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;

/**
 * Slug behavior
 */
class SluggableBehavior extends Behavior {

    /**
     *
     * @var type 
     */
    protected $_defaultConfig = [
        'field' => 'title',
        'slug' => 'slug',
        'replacement' => '-',
        'implementedFinders' => [
            'slugged' => 'findSlug',
            'check' => 'checkExist'
        ]
    ];

    /**
     * 
     * @param Entity $entity
     */
    public function slug(Entity $entity) {
        $config = $this->config();
        $entity->set($config['slug'], $this->_doSlug($config, $entity->get($config['field'])));
    }

    /**
     * 
     * @param type $config
     * @param type $title
     * @return type
     */
    private function _doSlug($config, $title) {
        return Inflector::slug($this->_removeSign($title), $config['replacement']);
    }

    /**
     * 
     * @param Query $query
     * @param array $options
     * @return type
     */
    public function findSlug(Query $query, array $options) {
        $config = $this->config();
        return $query->where([$config['slug'] => $options['slug']]);
    }

    /**
     * 
     * @param Query $query
     * @param array $options
     * @return type
     */
    public function checkExist(Query $query, array $options) {
        return $this->findSlug($query, $this->_doSlug($this->config(), $options)) != null;
    }

    /**
     * 
     * @param Event $event
     * @param Entity $entity
     */
    public function beforeSave(Event $event, Entity $entity) {
        $this->slug($entity);
    }

    /**
     * 
     * @param type $str
     * @return string
     */
    protected function _removeSign($str) {
        if (!$str)
            return;
        $signed = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ"
            , "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ"
            , "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă"
            , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ"
            , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ", "ê", "ù", "à");
        $unsigned = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"
            , "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o"
            , "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A"
            , "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O"
            , "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D", "e", "u", "a");
        return mb_strtolower(str_replace($signed, $unsigned, $str));
    }

}
