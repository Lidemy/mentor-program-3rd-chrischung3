## 交作業流程

Step 1. 在自己的 Terminal：
	`git branch week1`
	`git checkout week1`

Step 2. 直接在資料夾裡面打開文件寫作業

Step 3. 寫完直接在 branch(week1) 裡面 commit，可以寫完一份作業就 commit 一次。
	`git commit -m "message"`

Step 4. 全部寫完之後：
	`git push origin week1`

Step 5. 到 GitHub 裡面 Lidemy / mentor-program-3rd-chrischung3 裡面點選 compare & pull request，可以在這裡問問題，create pull request 之後 copy url

Step 6. 到 GitHub 裡面 Lidemy / homeworks-3rd 裡面 create issue，標題要符合規定 [Week1] （W 要大寫)，內容貼上上面複製的 url。

Step 7. 待 Huli merge 完之後，回到自己的 Terminal：
	`git checkout master`
	`git pull origin master`
	`git branch -d week1`

完成！