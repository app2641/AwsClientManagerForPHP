<?php


namespace Acm;

use Aws\AutoScaling\AutoScalingClient;
use Aws\CloudFormation\CloudFormationClient;
use Aws\CloudFront\CloudFrontClient;
use Aws\CloudSearch\CloudSearchClient;
use Aws\CloudTrail\CloudTrailClient;
use Aws\CloudWatch\CloudWatchClient;
use Aws\DirectConnect\DirectConnectClient;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Ec2\Ec2Client;
use Aws\ElastiCache\ElastiCacheClient;
use Aws\ElasticBeanstalk\ElasticBeanstalkClient;
use Aws\ElasticLoadBalancing\ElasticLoadBalancingClient;
use Aws\ElasticTranscoder\ElasticTranscoderClient;
use Aws\Emr\EmrClient;

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
        $access_key = getenv('AWS_ACCESS_KEY_ID');
        if ($access_key === false || $access_key === '') {
            throw new \Exception('環境変数AWS_ACCESS_KEY_IDが指定されていません');
        }

        $secret_key = getenv('AWS_SECRET_ACCESS_KEY');
        if ($secret_key === false || $secret_key === '') {
            throw new \Exception('環境変数AWS_SECRET_ACCESS_KEYが指定されていません');
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
        $config = self::getConfig($config);
        return CloudFormationClient::factory($config);
    }


    /**
     * @return CloudFrontClient
     **/
    public static function getCloudFront ($config = array())
    {
        $config = self::getConfig($config);
        return CloudFrontClient::factory($config);
    }


    /**
     * @return CloudSearchClient
     */
    public static function getCloudSearch ($config = array())
    {
        $config = self::getConfig($config);
        return CloudSearchClient::factory($config);
    }


    /**
     * @return CloudTrailClient
     */
    public static function getCloudTrail ($config = array())
    {
        $config = self::getConfig($config);
        return CloudTrailClient::factory($config);
    }


    /**
     * @return CloudWatchClient
     */
    public static function getCloudWatch ($config = array())
    {
        $config = self::getConfig($config);
        return CloudWatchClient::factory($config);
    }


    /**
     * @return DirectConnectClient
     */
    public static function getDirectConnect ($config = array())
    {
        $config = self::getConfig($config);
        return DirectConnectClient::factory($config);
    }


    /**
     * @return DynamoDbClient
     */
    public static function getDynamoDb ($config = array())
    {
        $config = self::getConfig($config);
        return DynamoDbClient::factory($config);
    }


    /**
     * @return Ec2Client
     */
    public static function getEc2 ($config = array())
    {
        $config = self::getConfig($config);
        return Ec2Client::factory($config);
    }


    /**
     * @return ElastiCacheClient
     */
    public static function getElastiCache ($config = array())
    {
        $config = self::getConfig($config);
        return ElastiCacheClient::factory($config);
    }


    /**
     * @return ElasticBeanstalkClient
     */
    public static function getElasticBeanstalk ($config = array())
    {
        $config = self::getConfig($config);
        return ElasticBeanstalkClient::factory($config);
    }


    /**
     * @return ElasticLoadBalancingClient
     */
    public static function getElasticLoadBalancing ($config = array())
    {
        $config = self::getConfig($config);
        return ElasticLoadBalancingClient::factory($config);
    }


    /**
     * @return ElasticTranscoderClient
     */
    public static function getElasticTranscoder ($config = array())
    {
        $config = self::getConfig($config);
        return ElasticTranscoderClient::factory($config);
    }


    /**
     * @return EmrClient
     */
    public static function getEmr ($config = array())
    {
        $config = self::getConfig($config);
        return EmrClient::factory($config);
    }
}

