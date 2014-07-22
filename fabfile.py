from fabric.api import local

def deploy(branch, commitMessage):
	commitMadKudu(branch, commitMessage)
	local('git push origin '+branch)
	local('git checkout master')
	local('git merge '+branch)
	local('git push origin master')
	local('grunt push')

def commitMadKudu(branch, commitMessage):
	local('git checkout '+branch)
	local("git add --all")
	local('git commit -m "'+commitMessage + '"')