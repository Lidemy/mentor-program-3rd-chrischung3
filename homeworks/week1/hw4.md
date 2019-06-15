## 跟你朋友介紹 Git


Git 是一個版號管理程式。

因爲程式會需要不斷的開發、更新或 debug，所以版號管理程式非常的重要，如果版本管理沒有做好，可能程式就會一直衝突，降低開發的效率。

Git 的整個運作可以想像為「用資料夾系統」來管理版號，只是我們不會實際看到資料夾的 icon。


### 開始導入 Git

首先，為了讓某個資料夾可以被 Git 管理，要先在 Terminal 上面開始 `git init`。輸入之後這個資料夾才會被 Git 管理。


### 把「想加入版本管理」的檔案加入被打包的行列

可以用 `git add .` 的指令把所有這個資料夾的所有檔案加入準備被打包的行列，或者可以用 `git add file_name` 把名為 file_name 的檔案加入，或者用 `git rm --cached file_name` 把名為 file_name 的檔案移出被打包的行列。


### 把一個版本的檔案封裝打包

要打包檔案之前，可以先用 `git status` 的指令看一下打包的內容，看到的資料會分成 untracked 跟 staged，後者就是代表即將被打包的檔案，而前者代表不要被打包的資料。這些不想要被打包的資料可以用 `.gitignore` 的方式紀錄，以後就不會被打包。實作上要先用 `touch .gitignore` 的指令建立 .gitignore 的檔案，然後透過 `vim .gitignore` vim 編輯器進入編輯，把每次打包該忽略的檔案名稱輸入進去後存檔就完成了 .gitignore 的建立。

每次在打包之前也可以透過 `git diff` 的指令查看這次準備打包跟前一次打包的差異。

待確定完要打包與不打包的資訊之後，就可以用 `git commit -m "message"`的指令打包，其中 "message" 的部分可以紀錄自己想要紀錄的資訊。


### 打包完後看 log 及轉換版本

打包完之後可以透過 `git log` 看到這次跟之前每次打包的資料：包含打包完特殊的版號（一組 hash），以及作者、時間，和自己標上的 message，也可以用 `git log --oneline` 看每次打包的基本資料。

如果想要進到某一次打包的資料夾的話，可以用 `git checkout "hash"` 的指令轉過去，這時資料夾中的內容就是當時打包的樣子。而要回到最新版本的話可以直接 `git checkout master` 回到目前最新的版本。


## 每次更動程式的必要步驟：建立 Branch

在開發或者是 debug 時為了不影響到之前穩定版本，必須用 `git branch new_branch_name` 的方式來 fork 檔案，並且在新 fork 出來的 branch 上面開發，才不會影響到原本的版本。也可以同時 fork 多個 branch 出來針對不同的開發目的更動檔案。

想要看看目前到底有哪些 branch 的話可以用 `git branch -v` 的指令查看，而在不同 branch 之間穿梭也可以直接用 checkout 的指令 `git checkout branch_name` 做到。


## 更新完後最後步驟：Merge Branch

在不同的平行時空開發完成之後，最後一步就是要把新的部分 merge 回原本的檔案並且變成最新的 master file。

要 merge 的時候要先搞清楚誰 merge 進誰的檔案中。通常都是新的 branch 要 merge 進 master，意思是說 master file 要加入 branch 所有的更動。所以實作上我們要先透過 `git checkout master` 回到 master 這個主要檔案後，再用 `git merge branch_name` 的方式把名為 branch_name 的 branch 合併進來。

如果出現 conflict，就必須用手動的方式改掉所有有衝突的地方，然後最後再 commit 一次，才能完成合併 + 打包。

確認完成之後可以用 `git branch -d branch_name` 的方式刪掉合併完的 branch。這樣就完成啦！




