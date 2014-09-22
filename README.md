AwsClientManager for PHP [![Build Status](https://travis-ci.org/app2641/AwsClientManagerForPHP.svg?branch=master)](https://travis-ci.org/app2641/AwsClientManagerForPHP) [![Coverage Status](https://coveralls.io/repos/app2641/AwsClientManagerForPHP/badge.png?branch=master)](https://coveralls.io/r/app2641/AwsClientManagerForPHP?branch=master)
=======

## Description

AWS SDK for PHP2 において各クライアントクラスを容易に呼び出すことが出来るライブラリ。

## Requirement

- PHP 5.*

## Usage

環境変数に AWS への接続に必要なパラメータを指定します。

```
$ export AWS_ACCESS_KEY_ID=your_aws_access_key
$ export AWS_SECRET_ACCESS_KEY=your_aws_secret_key
# export AWS_DEFAUKT_REGION=your_region
```


S3Client クラスを呼び出すサンプル。

```
<?php
use Acm\Acm;
$s3 = Acm::getS3();
$response = $s3->getObject(....);
```

Ec2Client クラスを呼び出すサンプル。

```
<?php
$ec2 = Acm::getEc2();
$images = $ec2->describeImages(....);
```

## Install

Composer からインストールすることが出来る。

```
{
	"require": {
		"app2641/aws-client-manager": "*"
	}
}
```

```
$ composer.phar install
```

## Licence

[BSD](https://github.com/app2641/AwsClientManagerForPHP/blob/master/LICENCE)

## Author

[app2641](https://github.com/app2641)

