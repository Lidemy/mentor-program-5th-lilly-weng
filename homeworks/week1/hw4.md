## 跟你朋友介紹 Git
### 什麼是 Git?
Git 是幫助我們做版本管理的工具
### 為什麼使用 Git?
透過 Git 的使用可以讓我們把所有的版本都保存起來，如果有團隊合作的話，也可以保存不同版本的檔案。  
菜哥現在是一個人，因此 Git 可以幫忙他做笑話的版本管理，未來如果有個笑話團隊，很多人把笑話改成不同版本或是增加新笑話的話，菜哥也可以透過 Git 做管理。
### 如何使用 Git?
1. 首先要告訴 Git 是要對哪一個資料夾做版本管理，先到 jokes 的資料夾中，使用 git init，這是告訴 git 要對 jokes 這個資料夾 initialize。
```
cd jokes
git init
```
2. 利用 git add. 先把所有的笑話加入版本控制
```
git add.
```
3. 利用 git commit 把這次的版本命名為 "first_version"
```
git commit -m "first_version"
```
### 如何使用 GitHub?
1. 雖然 Git 為了我們做這麼多事，但其實我們也不知道他到底做了什麼事，所以我們可以利用 GitHub 來知道到底發生了什麼事。
所以先請菜哥去開一個 GitHub 的帳號，並在上面開一個 Repo。
2. 把 GitHub Repo 的 HTTPS url 複製下來，告訴 git 要連去這個 Repo
```
git remote add origin 'your_url'
```  
如果前面已經連過 Repo，遠端資料庫會被記住，可以查看遠端的資料庫是不是自己要放資料的地方
```
git remote -v
```
3. 用 push的方式把笑話的資料夾推到 Repo 中的 master branch，這樣我們就可以在 GitHub 上看到所有的笑話版本了
```
git push -u origin master
```
### 如何更新至 Local 端?
如果今天菜哥的朋友更改了一些笑話內容，菜哥 approve pull request 之後要怎麼更新到 local 端呢?
1. 首先到先告訴 git 要去的 Repo
```
git remote add origin 'your_url'
```
2. 讓 git 到我們想要更新的 Branch，利用 pull 指令將新版的笑話檔案下載下來
```
git checkout master
git pull origin master
```
3. Local 端和 GitHub 同步