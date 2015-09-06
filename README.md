# sunlight_bot
### 中研院斷詞處理機器人
### 中研院斷瓷系統[網址](http://sunlight.iis.sinica.edu.tw/uwextract/demo.htm)
### 系統執行環境
Linux(建議), Windows
## Usage
If you have php5-cli, open terminal or cmd.exe and input the command : 

```bash
php your-path/sinica.php
```

then you can see the output result strings.

### 新增讀檔版本

sample text : input.txt, 預設編碼: utf-8

使用下列指令 : 

```bash
php your-path/sinica2.php
```

### Dependencies

需要使用opencc 套件，此套件在Linux下容易安裝，測試作業系統環境為: Linux/Ubuntu

### opencc 套件安裝參考

[參考網址](http://code.onnie.biz/2013/09/ubuntu-opencc-php.html)

### 目前遇到已知的問題

utf-8的繁體與簡體文章夾雜，轉換成都是utf-8繁體之後再轉成big5繁體會出現無法預期的錯誤

需轉成big5原因是因為中研院斷詞系統只支援big5碼，若用utf-8則會導致輸出斷詞結果為亂碼

斷詞系統無法對全型的標點符號和數字進行處理，解決方式是移除這些全型字元或是將其轉半形