<?php
    /**
     * @param $url ?求网址
     * @param bool $params ?求??
     * @param int $ispost ?求方式
     * @param int $https https??
     * @return bool|mixed
     */
class curlob {
	private $httpCode = [];
	private $httpInfo = [];
	private $httpRes;
	private $ch;	
	
	// 初始
	public function __construct($url, $params = false, $ispost = 0, $https = 0, $header = ['Content-Type: application/x-www-form-urlencoded;charset=utf-8']) {
	  try {	  	
			$this->ch = curl_init();  
      curl_setopt($this->ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);        
      curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');       
      curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);        
      curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
        
        if ($https) {
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE); // ??????源的?查
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, FALSE); // ???中?查SSL加密算法是否存在
        }
        if ($ispost) {
            curl_setopt($this->ch, CURLOPT_POST, true);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($this->ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                if (is_array($params)) {
                    $params = http_build_query($params);
                }
                curl_setopt($this->ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($this->ch, CURLOPT_URL, $url);
            }
        }

        $this->httpRes = curl_exec($this->ch);

        if ($this->httpRes === FALSE) {
            return "cURL Error: " . curl_error($this->ch);
            return false;
        }

        $this->httpCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        $this->httpInfo = array_merge($this->httpInfo, curl_getinfo($this->ch));
        curl_close($this->ch);        
		}		// Catch any errors
		catch ( Exception $e ) {
			$this->throwError('create curl => '.$e->getMessage());
		}
  }
  
  public function gethttpCode() {
  	return $this->httpCode;
  }
  public function gethttpInfo() {
  	return $this->httpInfo;
  }
  public function gethttpRes() {
  	return $this->httpRes;
  }
  
  // 消滅
  public function __destruct() {  	
     unset($this->ch);
  }

}
?>