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
use Aws\Glacier\GlacierClient;
use Aws\Iam\IamClient;
use Aws\Kinesis\KinesisClient;
use Aws\OpsWorks\OpsWorksClient;
use Aws\Rds\RdsClient;
use Aws\Redshift\RedshiftClient;
use Aws\Route53\Route53Client;
use Aws\S3\S3Client;
use Aws\Ses\SesClient;
use Aws\SimpleDb\SimpleDbClient;
use Aws\Sns\SnsClient;
use Aws\Sqs\SqsClient;
use Aws\StorageGateway\StorageGatewayClient;
use Aws\Sts\StsClient;
use Aws\Support\SupportClient;
use Aws\Swf\SwfClient;

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


    /**
     * @return GlacierClient
     */
    public static function getGlacier ($config = array())
    {
        $config = self::getConfig($config);
        return GlacierClient::factory($config);
    }


    /**
     * @return IamClient
     */
    public static function getIam ($config = array())
    {
        $config = self::getConfig($config);
        return IamClient::factory($config);
    }


    /**
     * @return KinesisClient
     */
    public static function getKinesis ($config = array())
    {
        $config = self::getConfig($config);
        return KinesisClient::factory($config);
    }


    /**
     * @return OpsWorksClient
     */
    public static function getOpsWorks ($config = array())
    {
        $config = array_merge(array(
            'region' => \Aws\Common\Enum\Region::NORTHERN_VIRGINIA
        ), $config);
        $config = self::getConfig($config);

        return OpsWorksClient::factory($config);
    }


    /**
     * @return RdsClient
     */
    public static function getRds ($config = array())
    {
        $config = self::getConfig($config);
        return RdsClient::factory($config);
    }


    /**
     * @return RedshiftClient
     */
    public static function getRedshift ($config = array())
    {
        $config = self::getConfig($config);
        return RedshiftClient::factory($config);
    }


    /**
     * @return Route53Client
     */
    public static function getRoute53 ($config = array())
    {
        $config = self::getConfig($config);
        return Route53Client::factory($config);
    }


    /**
     * @return S3Client
     */
    public static function getS3 ($config = array())
    {
        $config = self::getConfig($config);
        return S3Client::factory($config);
    }


    /**
     * @return SesClinet
     */
    public static function getSes ($config = array())
    {
        $config = array_merge(array(
            'region' => \Aws\Common\Enum\Region::NORTHERN_VIRGINIA
        ), $config);
        $config = self::getConfig($config);
        return SesClient::factory($config);
    }


    /**
     * @return SimpleDbClient
     */
    public static function getSimpleDb ($config = array())
    {
        $config = self::getConfig($config);
        return SimpleDbClient::factory($config);
    }


    /**
     * @return SnsClient
     */
    public static function getSns ($config = array())
    {
        $config = self::getConfig($config);
        return SnsClient::factory($config);
    }


    /**
     * @return SqsClient
     */
    public static function getSqs ($config = array())
    {
        $config = self::getConfig($config);
        return SqsClient::factory($config);
    }


    /**
     * @return StorageGatewayClient
     */
    public static function getStorageGateway ($config = array())
    {
        $config = self::getConfig($config);
        return StorageGatewayClient::factory($config);
    }


    /**
     * @return StsClient
     */
    public static function getSts ($config = array())
    {
        $config = self::getConfig($config);
        return StsClient::factory($config);
    }


    /**
     * @return SupportClient
     */
    public static function getSupport ($config = array())
    {
        $config = array_merge(array(
            'region' => \Aws\Common\Enum\Region::NORTHERN_VIRGINIA
        ), $config);
        $config = self::getConfig($config);
        return SupportClient::factory($config);
    }


    /**
     * @return SwfClient
     */
    public static function getSwf ($config = array())
    {
        $config = self::getConfig($config);
        return SwfClient::factory($config);
    }
}

