<?php

namespace Stone\Support;

final class File{

	private static $extensions = array(
		'.php', '.js', '.css', '.json',
		'.png', '.jpg', '.jpeg', '.gif',
		'.mp3',
		'.wav', '.mp4'
	);

	/**
	 * Removes the extension if one in a filename
	 * 
	 * @param string $filename
	 * @return string
	 */
	final public static function removeExtension($filename){
		foreach(self::$extensions as $v){
			if(substr($filename, strlen($v)) == $v){
				$filename = substr($filename, 0, -strlen($v));
				break;
			}
		}

		return $filename;
	}

}