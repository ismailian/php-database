<?php

use PhpDatabase\Database;
use PHPUnit\Framework\TestCase;

/**
 * tests for the PhpDatabase module
 */
class PhpDatabaseTest extends TestCase
{

    /**
     * @test
     */
    public function select_data_from_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $data = $db->limit(10)->select('wheels');

        $this->assertIsArray($data);
        $this->assertEquals(10, count($data));
    }

    /**
     * @test
     */
    public function select_a_single_record_from_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $rows = $db->limit(1)->select('wheels');

        $this->assertIsArray($rows[0]);
        $this->assertArrayHasKey('id', $rows[0]);
    }

    /**
     * @test
     */
    public function insert_data_into_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $status = $db->set(['wheel' => 'A5', 'number' => 1])->insert('numbers');

        $this->assertIsNumeric($status);
        $this->assertNotEquals(0, $status);
    }

    /**
     * @test
     */
    public function update_data_on_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $status = $db->set(['wheel' => 'A4'])->where(['number' => 1])->update('numbers');

        $this->assertIsBool($status);
        $this->assertEquals(true, $status);
    }

    /**
     * @test
     */
    public function delete_data_from_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $status = $db->where(['wheel' => 'A4'])->delete('numbers');

        $this->assertIsBool($status);
        $this->assertEquals(true, $status);
    }

    /**
     * @test
     */
    public function truncate_table()
    {
        $db = new Database('localhost', 'root', '', 'mtl_wheels');

        $status = $db->truncate('winners');

        $this->assertIsBool($status);
        $this->assertEquals(true, $status);
    }
}
