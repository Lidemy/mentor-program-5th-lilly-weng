## 交作業流程
1. **在Lidemy下創建自己的 Repo :**  
透過classroom的連結創建自己專屬的 Repository
2. **將 Repo 下載到 Local 端:**  
打開 Git Bash，前往想要放 Repo 的地方，例如 cd desktop，之後至 GitHub 複製 Repo 的 Https 網址，clone 至桌面
```
cd desktop
cd clone https://github.com/Lidemy/mentor-program-5th-lilly-weng.git
```
3. **創建一個放作業的 Branch:**
```
cd mentor-program-5th-lilly-weng
git checkout -b Week1
```
4. **將寫好的作業推到 GitHub 上:**  
作業第一次加入 git 版本控制
```
git add . 
git commit -m 'hw1'
git push origin Week1
```  
如果已經加入過版本控制了，可用 -am 指令
```
git commit -am 'hw1'
git push origin Week1
```
可以用 git status 來判斷檔案是否有加入過版本控制，如果是 untracked files 則是未加入，modified 則是已加入
```
git status
```

5. **至 GitHub 上 pull request:**  
在 master branch 的地方 Create request，如果有問題可以 leave a comment

6. **若作業有想修改的:**  
在 Local 改好後從第四步開始，可以在修改 message 做紀錄  
如果已經關掉 terminal 了，需要 cd 至 mentor-program 那個資料夾，再commit
```
git commit -am 'message'  //message 的地方可以標示為第幾個版本或是修改了什麼
```

7. **上傳 pull requests的網址至 learning system:**  
打開 GitHub 後會看到 pull requests 的訊息，按下 pull request 的綠色按鈕後，或是自行 create new pull request，將網址貼到 learning system 上傳作業那邊 

8. **pull request 被 approved後:**  
需要 pull down master branch，這樣 Local 和 GitHub才會同步
```
git checkout master
git pull origin master
git branch -d week1
```

