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
        $this->access_key = getenv('AWS_ACCESS_KEY');
        $this->secret_key = getenv('AWS_SECRET_KEY');
        $this->region     = getenv('AWS_DEFAULT_REGION');
    }


    /**
     * @return void
     **/
    public function tearDown ()
    {
        putenv('AWS_ACCESS_KEY='.$this->access_key);
        putenv('AWS_SECRET_KEY='.$this->secret_key);
        putenv('AWS_DEFAULT_REGION='.$this->region);
    }


    /**
     * @test
     * @expectedException           Exception
     * @expactedExceptionMessage    環境変数AWS_ACCESS_KEYが指定されていません
     * @group acm-not-set-access-key
     * @group acm
     */
    public function 環境変数AWS_ACCESS_KEYが指定されていない場合 ()
    {
        putenv('AWS_ACCESS_KEY');
        $config = Acm::getConfig();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    環境変数AWS_SECRET_KEYが指定されていません
     * @group acm-not-set-secret-key
     * @group acm
     */
    public function 環境変数AWS_SECRET_KEYが指定されていない場合 ()
    {
        putenv('AWS_SECRET_KEY');
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
}

