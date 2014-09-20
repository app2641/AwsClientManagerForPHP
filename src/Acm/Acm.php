<?php


namespace Acm;

use Aws\AutoScaling\AutoScalingClient;
use Aws\CloudFormation\CloudFormationClient;
use Aws\CloudFront\CloudFrontClient;

class Acm
{

    /**
     * @return void
     **/
    private function __construct ()
    {
    }


    /**
     * @return void
     **/
    private function __clone ()
    {
        throw new \Exception('Acfクラスをクローンすることは出来ません');
    }


    /**
     * Awsクライアントをインスタンス化するための環境変数を取得する
     *
     * @param  array $config  基本設定を上書きするための配列
     * @return array
     **/
    public static function getConfig ($config = array())
    {
        $access_key = getenv('AWS_ACCESS_KEY');
        if ($access_key === false || $access_key === '') {
            throw new \Exception('環境変数AWS_ACCESS_KEYが指定されていません');
        }

        $secret_key = getenv('AWS_SECRET_KEY');
        if ($secret_key === false || $secret_key === '') {
            throw new \Exception('環境変数AWS_SECRET_KEYが指定されていません');
        }

        $region = getenv('AWS_DEFAULT_REGION');
        if ($region === false || $region === '') {
            throw new \Exception('環境変数AWS_DEFAULT_REGIONが指定されていません');
        }

        return array_merge(array(
            'key' => $access_key,
            'secret' => $secret_key,
            'region' => $region
        ), $config);
    }


    /**
     * @return AutoScalingClient
     */
    public static function getAutoScaling ($config = array())
    {
        $config = self::getConfig($config);
        return AutoScalingClient::factory($config);
    }


    /**
     * @return CloudFormationClient
     **/
    public static function getCloudFormation ($config = array())
    {
        $config = self::getConfig();
        return CloudFormationClient::factory($config);
    }


    /**
     * @return CloudFrontClient
     **/
    public static function getCloudFront ($config = array())
    {
        $config = self::getConfig();
        return CloudFrontClient::factory($config);
    }
}

