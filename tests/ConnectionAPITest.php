<?php
    require __DIR__ . DIRECTORY_SEPARATOR . '/../ConnectionAPI.php';

    class ConnectionApiTest extends PHPUnit\Framework\TestCase{
        public function testGetMovieJson(){
            $name = "Star+Wars";
            $mock = \Mockery::mock('file_get_contents');
            $objetive_json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'resultGetMovieJson.json');
            $mock->shouldReceive('file_get_contents')->andReturn($objetive_json);

            $apiConnection = new ConnectionAPI('731e41f');
            $obtained_json = $apiConnection->getMovieJson($name);

            //Comparativa
            $this->assertEquals($objetive_json, $obtained_json);
        }

        public function testSearchMovieByName(){
            $name = "Star+Wars";
            $mock = \Mockery::mock('file_get_contents');
            $json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'resultSerachMovieByNameTest.json');
            $mock->shouldReceive('file_get_contents')->andReturn($json);

            $apiConnection = new ConnectionAPI('731e41f');
            $obtainedArray = $apiConnection->searchMovieByName($name);

            $objetiveArray = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'StartWarsSearchArray.json'),true);

            $this->assertSame($obtainedArray, $objetiveArray);
        }
    }