<?php
    require __DIR__ . DIRECTORY_SEPARATOR . '..\ConnectionAPI.php';

    class ConnectionApiTest extends PHPUnit\Framework\TestCase{
        public function testGetMovieJson(){
            $name = "Star+Wars";
            $mock = \Mockery::mock('file_get_contents');
            print("\nPath: " . __DIR__ . DIRECTORY_SEPARATOR . 'resultGetMovieJson.json' . "\n");
            $objetive_json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'resultGetMovieJson.json');
            $mock->shouldReceive('file_get_contents')->andReturn($objetive_json);

            $apiConnection = new ConnectionAPI('731e41f');
            $obtained_json = $apiConnection->getMovieJson($name);

            //Comparativa
            $this->assertEquals($objetive_json, $obtained_json);
        }
    }