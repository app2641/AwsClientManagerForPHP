<?php


use Acm\Acm;

class AcmTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var string
     **/
    private $access_key;


    /**
     * @var string
     **/
    private $secret_key;


    /**
     * @var string
     **/
    private $region;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->access_key = getenv('AWS_ACCESS_KEY_ID');
        $this->secret_key = getenv('AWS_SECRET_ACCESS_KEY');
        $this->region     = getenv('AWS_DEFAULT_REGION');
    }


    /**
     * @return void
     **/
    public function tearDown ()
    {
        putenv('AWS_ACCESS_KEY_ID='.$this->access_key);
        putenv('AWS_SECRET_ACCESS_KEY='.$this->secret_key);
        putenv('AWS_DEFAULT_REGION='.$this->region);
    }


    /**
     * @test
     * @expectedException           Exception
     * @expactedExceptionMessage    環境変数AWS_ACCESS_KEY_IDが指定されていません
     * @group acm-not-set-access-key
     * @group acm
     */
    public function 環境変数AWS_ACCESS_KEY_IDが指定されていない場合 ()
    {
        putenv('AWS_ACCESS_KEY_ID');
        $config = Acm::getConfig();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    環境変数AWS_SECRET_ACCESS_KEYが指定されていません
     * @group acm-not-set-secret-key
     * @group acm
     */
    public function 環境変数AWS_SECRET_ACCESS_KEYが指定されていない場合 ()
    {
        putenv('AWS_SECRET_ACCESS_KEY');
        $config = Acm::getConfig();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    環境変数AWS_DEFAULT_REGIONが指定されていません
     * @group acm-not-set-region
     * @group acm
     */
    public function 環境変数AWS_DEFAULT_REGIONが指定されていない場合 ()
    {
        putenv('AWS_DEFAULT_REGION');
        $config = Acm::getConfig();
    }


    /**
     * @test
     * @group acm-getconfig
     * @group acm
     */
    public function クライアントクラス生成用の設定を取得する ()
    {
        $config = Acm::getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('key', $config);
        $this->assertEquals($this->access_key, $config['key']);

        $this->assertArrayHasKey('secret', $config);
        $this->assertEquals($this->secret_key, $config['secret']);

        $this->assertArrayHasKey('region', $config);
        $this->assertEquals($this->region, $config['region']);
    }


    /**
     * @test
     * @group acm-getconfig-override
     * @group acm
     */
    public function 基本設定を上書きする場合 ()
    {
        $config = Acm::getConfig(array(
            'region' => 'foo!', 'hello' => 'John!'
        ));

        $this->assertArrayHasKey('region', $config);
        $this->assertEquals('foo!', $config['region']);

        $this->assertArrayHasKey('hello', $config);
        $this->assertEquals('John!', $config['hello']);
    }


    /**
     * @test
     * @group acm-get-autoscaling
     * @group acm
     */
    public function AutoScalingクライアントを取得する場合 ()
    {
        $as = Acm::getAutoScaling();
        $this->assertInstanceOf('Aws\AutoScaling\AutoScalingClient', $as);
    }


    /**
     * @test
     * @group acm-get-cloud-formation
     * @group acm
     */
    public function CloudFormationクライアントを取得する場合 ()
    {
        $cf = Acm::getCloudFormation();
        $this->assertInstanceOf('Aws\CloudFormation\CloudFormationClient', $cf);
    }


    /**
     * @test
     * @group acm-cloud-front
     * @group acm
     */
    public function CloudFrontクライアントを取得する場合 ()
    {
        $cf = Acm::getCloudFront();
        $this->assertInstanceOf('Aws\CloudFront\CloudFrontClient', $cf);
    }


    /**
     * @test
     * @group acm-cloud-search
     * @group acm
     */
    public function CloudSearchクライアントを取得する場合 ()
    {
        $cs = Acm::getCloudSearch();
        $this->assertInstanceOf('Aws\CloudSearch\CloudSearchClient', $cs);
    }


    /**
     * @test
     * @group acm-cloud-trail
     * @group acm
     */
    public function CloudTrailクライアントを取得する場合 ()
    {
        $ct = Acm::getCloudTrail();
        $this->assertInstanceOf('Aws\CloudTrail\CloudTrailClient', $ct);
    }


    /**
     * @test
     * @group acm-cloud-watch
     * @group acm
     */
    public function CloudWatchクライアントを取得する場合 ()
    {
        $cw = Acm::getCloudWatch();
        $this->assertInstanceOf('Aws\CloudWatch\CloudWatchClient', $cw);
    }


    /**
     * @test
     * @group acm-direct-connect
     * @group acm
     */
    public function DirectConnectクライアントを取得する場合 ()
    {
        $dc = Acm::getDirectConnect();
        $this->assertInstanceOf('Aws\DirectConnect\DirectConnectClient', $dc);
    }


    /**
     * @test
     * @group acm-dynamo-db
     * @group acm
     */
    public function DynamoDbクライアントを取得する場合 ()
    {
        $db = Acm::getDynamoDb();
        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $db);
    }


    /**
     * @test
     * @group acm-ec2
     * @group acm
     */
    public function Ec2クライアントを取得する場合 ()
    {
        $ec2 = Acm::getEc2();
        $this->assertInstanceOf('Aws\Ec2\Ec2Client', $ec2);
    }


    /**
     * @test
     * @group acm-elasti-cache
     * @group acm
     */
    public function ElastiCacheクライアントを取得する場合 ()
    {
        $ec = Acm::getElastiCache();
        $this->assertInstanceOf('Aws\ElastiCache\ElastiCacheClient', $ec);
    }


    /**
     * @test
     * @group acm-elastic-beanstalk
     * @group acm
     */
    public function ElasticBeanstalkクライアントを取得する場合 ()
    {
        $eb = Acm::getElasticBeanstalk();
        $this->assertInstanceOf('Aws\ElasticBeanstalk\ElasticBeanstalkClient', $eb);
    }


    /**
     * @test
     * @group acm-elastic-load-balancing
     * @group acm
     */
    public function ElasticLoadBalancingクライアントを取得する場合 ()
    {
        $elb = Acm::getElasticLoadBalancing();
        $this->assertInstanceOf('Aws\ElasticLoadBalancing\ElasticLoadBalancingClient', $elb);
    }


    /**
     * @test
     * @group acm-elastic-transcoder
     * @group acm
     */
    public function ElasticTranscoderクライアントを取得する場合 ()
    {
        $et = Acm::getElasticTranscoder();
        $this->assertInstanceOf('Aws\ElasticTranscoder\ElasticTranscoderClient', $et);
    }


    /**
     * @test
     * @group acm-emr
     * @group acm
     */
    public function Emrクライアントを取得する場合 ()
    {
        $emr = Acm::getEmr();
        $this->assertInstanceOf('Aws\Emr\EmrClient', $emr);
    }
}

