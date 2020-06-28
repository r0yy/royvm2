# VM2
Sourcecode voor VM2 practicum

SETUP:

Deze oplossing genereert vier servers, namelijk: WS1 en WS2 (webservers), lb1(de loadbalancer) en db1 (database)

Navigeer naar home-directory, waarin een map gecreëerd moet worden genaamd "playbooks"
```ruby
mkdir playbooks
```
-Hierin maken we een nieuwe map aan: "gold"
```ruby
mkdir gold
```
Plaats hier vervolgens alle bestanden in, zodat de layout er als volgt uitziet:.
```ruby
ubuntu@ubun2004:~/playbooks/gold$ tree
.
├── ansible.cfg
├── deploy
├── files
│   └── nginx.conf
├── group_vars
│   ├── all
│   └── all.save
├── hosts
├── lb.yml
├── prerequisites
├── roles
│   ├── common
│   │   ├── handlers
│   │   │   └── main.yml
│   │   └── tasks
│   │       └── main.yml
│   ├── database
│   │   ├── handlers
│   │   │   └── main.yml
│   │   └── tasks
│   │       └── main.yml
│   └── web
│       ├── handlers
│       │   └── main.yml
│       ├── tasks
│       │   └── main.yml
│       └── templates
│           ├── default
│           └── index.php
├── site.yml
├── templates
│   ├── default
│   ├── index.php.j2
│   └── nginx.conf.j2
└── Vagrantfile

14 directories, 22 files
```

Dependancies die geïnstalleerd moeten zijn op de host 

Virtualbox;
Ansible;
Vagrant;

Voer hiervoor het script "prerequisites" uit:
```ruby
./prerequisites
```
Wanneer dit script is uitgevoerd zijn de voorbereidingen klaar en kan er gedeployed worden:
```ruby
./deploy
```
