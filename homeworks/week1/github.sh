

username=$1

name=$(curl https://api.github.com/users/${username} | grep -w "name")
bio=$(curl https://api.github.com/users/${username} | grep -w "bio")
location=$(curl https://api.github.com/users/${username} | grep -w "location")
blog=$(curl https://api.github.com/users/${username} | grep -w "blog")

echo "${name:10:-1}
${bio:9:-1}
${location:14:-1}
${blog:10:-1}"





