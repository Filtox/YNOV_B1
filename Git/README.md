# Question 1 :

#### Sur une VM serveur : Créez un serveur git qui servira un repo git en SSH. Nommez le repo tp-note

```
sudo apt install git
sudo apt install ssh
git init tp-note
cd tp-note
sudo adduser --system --shell /bin/bash --group --disabled-password --home /var/git/ git
sudo chown git:git /var/git
ssh-keygen -t rsa
chmod 755 ~/.ssh
chmod 600 ~/.ssh/id_rsa
chmod 644 ~/.ssh/id_rsa.pub
sudo mkdir /var/git/.ssh
sudo touch /var/git/.ssh/authorized_keys
ssh git@gitlab.bzctoons.net/pierredasilva/tp_note
```

# Question 2 :

#### Toujours sur la VM serveur : créez un hook pre-receive qui aura pour fonctions d'empêcher tout push sur la branche master, et de vérifier que la variable GIT_AUTHOR_EMAIL est bien remplie et contient bien un '@'.:

```
#!/bin/bash
read GIT_AUTHOR_EMAIL;
if [[ ! $GIT_AUTHOREMAIL =~ ^[A-Z0-9.%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}$]]; then
echo "Invalid Email"
exit 1
fi
protected_branch='master'
while read local_ref local_sha refname remote_sha;
do
remote_branch=$(echo $refname | sed -e 's,./(.),\1,')
if [ $protected_branch = $remote_branch ];
then
echo "push annulé, vous n'etes pas autorisé à push sur $protected_branch."
exit 1
fi
done
exit 0
```

# Question 3 :

#### Sur une VM client : clonez ce repo git

```
git clone git@gitlab.bzctoons.net/pierredasilva/tp_note		// On me demande un mot de passe pour cloner donc je ne peux pas cloner étant donné que je ne connais pas ce mot de passe en question
```

# Question 4 :

#### Sur la VM client : Créez un fichier readme.txt et ajoutez-y du texte. Commitez avec le message suivant :" first commit"  et pushez sur le serveur git distant.

```
sudo touch readme.txt
echo "test" >> readme.txt
git add readme.txt
git commit -m "first commit"
git push origin master
```

# Question 5 :

#### Sur la VM client : créez une branche tp-note-branch et refaites le push

```
git checkout -b tp-note-branch
git push origin tp-note-branch
```

# Question 6 :

#### Sur la VM client : créez une branche tp-note-branch-2. Ajoutez du texte dans le fichier readme.txt et commitez. Retournez sur la branche tp-note-branch et mergez le contenu de tp-note-branch-2 dans tp-note-branch. Poussez sur le serveur distant

```
git checkout -b tp-note-branch-2
echo "test2" >> readme.txt
git add readme.txt
git commit -m "branche commitée"
git checkout tp-note-branch
git merge tp-note-branch-2
git push tp-note-branch
```
