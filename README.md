# CertificateGirl 獎狀娘

**獎狀娘**（英語：**CertificateGirl**，專案名：**TNFSH-sport-competition-certificate-producer**），是由[xiplus](https://github.com/Xi-Plus)進行[調教](http://dict.revised.moe.edu.tw/cgi-bin/cbdic/gsweb.cgi?o=dcbdic&searchid=Z00000052643)，而後無償受雇於臺南一中資訊社的女僕，工作為在學校運動會時協助產出獎狀，基本上每年工作兩天。

## 同伴
必須
* [PHP娘](https://zh.moegirl.org/zh-hant/PHP%E5%A8%98)
* [Excel娘](https://zh.wikipedia.org/zh-tw/Microsoft_Excel)

[配合食用風味更佳](https://zh.moegirl.org/zh-hant/%E9%85%8D%E5%90%88oo%E9%A3%9F%E7%94%A8%E9%A3%8E%E5%91%B3%E6%9B%B4%E4%BD%B3)
* [Notepad++](https://notepad-plus-plus.org/)

## [正確的食用方法](https://zh.moegirl.org/zh-hant/%E4%B8%80%E5%AE%9A%E6%98%AF%E6%88%91%E6%89%93%E5%BC%80%E7%9A%84%E6%96%B9%E5%BC%8F%E4%B8%8D%E5%AF%B9)
1. 將整個**獎狀娘**下載至你的[Windows娘](https://zh.wikipedia.org/zh-tw/Windows%E5%A8%98)上
2. 如有需要班級座號自動取代為姓名功能，填妥```student.csv```，在```index.php```裡設定```$replacename```為```true```，否則為```false```（此功能僅限單人獎狀）
3. 選擇印製單人或四人獎狀
 * 若是單人獎狀，填妥```one.csv```，在```index.php```裡設定```$file```為```"one"```
 * 若是四人獎狀，填妥```four.csv```，在```index.php```裡設定```$file```為```"four"```
 * 注意```.csv```檔案編碼需為```UTF-8-BOM```，可使用```Notepad++```轉換
4. 使用**PHP娘**執行```php index.php```，將產生```output.xml```
5. 使用**Excel娘**打開```output.xml```，預覽列印調整邊界確認後即可列印
6. name儲存格若為空白，就不會出現"同學"。(適用於接力)
