<?php

/**
 * MessagesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MessagesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MessagesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Messages');
    }
	//this method will be used to count messages belonging to the current logged in user
	public function countMessages($username)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	 SELECT COUNT(message) FROM messages WHERE recepient = '$username'
	 ");
	 return $query;
	}
	//this message will retrieve the current logged in user messages from the inbox, limit is 5
	public function retreiveMessages($username)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	 SELECT messages.id,messages.sender,messages.created_at,messages.message FROM messages WHERE recepient = '$username'  ORDER BY created_at DESC
	 LIMIT 2
	 ");
	 return $query;
	}
	//retrieve all message for the logged in user
	public function retrieveAllMessages($username)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	 SELECT messages.id, messages.sender,messages.created_at,messages.message, messages.attachement FROM messages WHERE recepient = '$username'  ORDER BY created_at DESC
	 ");
	 return $query;
	}
	
	public static $messageInvestor= array(
		'header' => 'New Message',
		'info' => 'Info applicant',
	);
	
	public function getMessageInvestor()
	{
		return self::$messageInvestor;
	}
	
	public static $editMessage= array(
		'header' => 'Edit Message',
		'info' => 'Edit the following message',
	);
	
	public function getEditMessage()
	{
		return self::$editMessage;
	}
	public function getMessageId($recepient)
	{
		$q=$this->createQuery('m')
			->select('m.id')
			->where('m.recepient = ?',$recepient)
			->orderBy('m.id DESC')
			->limit(1);
		return $q->fetchArray();
	}
	public static $messageApplicant=array(
		'header' => 'New Reply Message',
		'info' => 'Reply to data administrator',
	);
	public function getMessageApplicant()
	{
		return self::$messageApplicant;
	}
}