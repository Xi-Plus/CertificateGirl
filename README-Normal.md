# TNFSH sport competition certificate producer
臺南一中運動會獎狀產生器

## 需求
必須
* [PHP](http://php.net)
* Excel

建議
* [Notepad++](https://notepad-plus-plus.org/)

## 使用方法
1. 將整個程式下載至你的電腦上
2. 如有需要班級座號自動取代為姓名功能，填妥```student.csv```，在```index.php```裡設定```$replacename```為```true```，否則為```false```（此功能僅限單人獎狀）
3. 選擇印製單人或四人獎狀
 * 若是單人獎狀，填妥```one.csv```，在```index.php```裡設定```$file```為```"one"```
 * 若是四人獎狀，填妥```four.csv```，在```index.php```裡設定```$file```為```"four"```
 * 注意```.csv```檔案編碼需為```UTF-8-BOM```，可使用```Notepad++```轉換
4. 使用**PHP**執行```php index.php```，將產生```output.xml```
5. 使用**Excel**打開```output.xml```，預覽列印調整邊界確認後即可列印
6. name儲存格若為空白，就不會出現"同學"。(適用於接力)
