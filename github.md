#github教學
###連接遠端庫
1. 首先fork我的項目
2. 把叉過去的項目也就是你的項目克隆到你的本地
3. 在命令行運行git branch development來創建一個新分支
4. 運行git checkout開發來切換到新分支
5. 運行git remote add upstream https://github.com/
6. 把我的庫添加為遠端庫
7. 運行git remote update更新
8. 運行git fetch upstream master拉取我的庫的更新到本地
9. 運行git rebase upstream / master將我的更新合併到你的分支
這是一個初始化流程，只需要做一遍就行，之後請一直在develop分支進行修改。

如果修改過程中我的庫有了更新，請重複7,8,9步。

修改之後，首先推到你的庫，然後登錄GitHub，在你的庫的首頁可以看到一個拉請求按鈕，點擊它，填寫一些說明信息，然後提交即可。
git add .
git commit -m "說明訊息"
git push origin devthree #推上去
New Pull requests 
