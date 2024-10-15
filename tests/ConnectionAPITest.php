<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . '/../ConnectionAPI.php';

    class ConnectionApiTest extends PHPUnit\Framework\TestCase{
        public function testGetMovieJson(){
            $id = 'tt0076759';

            $mock = \Mockery::mock('file_get_contents');
            $expected_json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'resultGetMovieJson.json');
            $mock->shouldReceive('file_get_contents')->andReturn($expected_json);

            $apiConnection = new ConnectionAPI('731e41f');
            $actual_json = $apiConnection->getMovieJson($id);

            $this->assertEquals($expected_json, $actual_json, 'Los json no coinciden.');
        }

        public function testSearchMovieByName(){
            $name = "Star Wars";
            
            $mock = \Mockery::mock('file_get_contents');
            $json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'resultSerachMovieByNameTest.json');
            $mock->shouldReceive('file_get_contents')->andReturn($json);

            $apiConnection = new ConnectionAPI('731e41f');
            $actual_array = $apiConnection->searchMovieByName($name);
            $expected_array = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'StartWarsSearchArray.json'),true);

            $this->assertSame($expected_array, $actual_array, 'Las peliculas no coinciden');
        }
    }