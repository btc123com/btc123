 <?php

/*
 * ClassName: Zip
 * Date: 2008-06-08
 * Author: ziyan.suo@163.com
 */
 
class Zip extends ZipArchive{

  private $zip;

	/*
	 * Function: Zip
   * Return: void
	 */
	public function __construct(){
		$this->zip = new ZipArchive();
	}
	
	/*
	 * Function: create
	 * Parameter: string
   * Return: bool
	 */
	public function open($fileName){
		if(!$this->zip->open($fileName,ZIPARCHIVE::CREATE)){
			return false;
		}
		else{
			return true;
		}
	}
	
	/*
	 * Function: add
	 * Parameter: array;
	 * Parameter: string
   * Return: bool
	 */
	public function add($arrFiles,$fileName){
		$succeed = true;
		if(!file_exists($fileName)){
			if(!$this->create($fileName)){
				$succeed = false;
			}
		}
		if($succeed){
			foreach($arrFiles as $file){
				if(file_exists($file)){
					if(!$this->zip->addFile($file)){
						$succeed = false;
						break;
					}
				}
			}
		}
		return $succeed;
	}
	
	/*
	 * Function: deleteName
	 * Parameter: string
   * Return: bool
	 */
	public function deleteName($arrFiles){
		$succeed = true;
		foreach($arrFiles as $file){
			if(!$this->zip->deleteName($file)){
				$succeed = false;
				break;
			}
		}
		return $succeed;
	}

	/*
	 * Function: extractTo
	 * Parameter: string
	 * Parameter: array
   * Return: bool
	 */
	public function extractTo($path,$arrExtract=array()){
		if(count($arrExtract)>0){
			return $this->zip->extractTo($path,$arrExtract);
		}
		else{
			return $this->zip->extractTo($path);
		}
	}
	/*
	 * Function: getCount
   * Return: int
	 */
	public function getCount(){
		return $this->zip->numFiles;
	}
	
	/*
	 * Function: getStatus
   * Return: int
	 */
	public function getStatus(){
		return $this->zip->status;
	}

	/*
	 * Function: close
   * Return: bool
	 */
	public function close(){
		return $this->zip->close();
	}

}
?>
