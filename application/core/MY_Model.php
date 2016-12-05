<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 1:14 PM
 */
class MY_Model extends CI_Model
{
    public $tbl_name;   // ten bang
    public $tbl_name_join; // ten bang join
    public $field_check;    // truong kiem tra su ton tai , co the la 1 phan tu hoac nhieu phan tu
    function __construct()
    {
        parent::__construct();
    }
    // lay tat ca ban ghi voi dk
    public function getAll($select='*',$where='1=1',$per_row=null,$per_page=null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->limit($per_page,$per_row)
            ->get()
            ->result();
    }
    public function getAllArray($select='*',$where='1=1',$per_row=null,$per_page=null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->limit($per_page,$per_row)
            ->get()
            ->result_array();
    }

    // dem so ban ghi cua query
    public function countAllQuery($select='*',$where='1=1')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->count_all_results();
    }
    // dem so ban ghi cua query
    public function countAllQueryOrder($select='*',$where='1=1',$order_by='',$type_order='DESC')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->order_by($order_by,$type_order)
            ->count_all_results();
    }
    // tao cac thong bao
    public function createNotify($type,$mess)
    {
        return array(
            'type' => $type,
            'mess' => $mess
        );
    }

    public function getAllJoin($select='*',$where='1=1',$condition_join=null,$type='',$order_by='',$type_order='DESC')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->join($this->tbl_name_join,$condition_join,$type)
            ->where($where)
            ->order_by($order_by,$type_order)
            ->get()
            ->result();
    }
    public function getAllJoinArray($select='*',$where='1=1',$condition_join=null,$type='',$order_by='',$type_order='DESC')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->join($this->tbl_name_join,$condition_join,$type)
            ->where($where)
            ->order_by($order_by,$type_order)
            ->get()
            ->result_array();
    }
    public function getAllJoinArrayLimit($select='*',$where='1=1',$condition_join=null,$type='',$order_by='',$type_order='DESC',$limit)
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->join($this->tbl_name_join,$condition_join,$type)
            ->where($where)
            ->limit($limit)
            ->order_by($order_by,$type_order)
            ->get()
            ->result_array();
    }
    public function getAllJoinArrayIn($select='*',$where='1=1',$condition_join=null,$type='',$order_by='',$type_order='DESC',$field='')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->join($this->tbl_name_join,$condition_join,$type)
            ->where_in($field,$where)
            ->order_by($order_by,$type_order)
            ->get()
            ->result_array();
    }


    // ham lay mot ban ghi
    public function getOne($select='*',$where='1=1')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->get()
            ->row;
    }

    // lay ban ghi voi like
    public function getAllLike($select='*',$where='1=1',$field='',$like='',$per_row=null,$per_page=null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->like($field,$like)
            ->limit($per_page,$per_row)
            ->get()
            ->result();
    }
    public function getAllOrder($select = '*',$where='1=1',$order_by ='',$type_order='DESC',$per_row = null,$per_page = null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->order_by($order_by,$type_order)
            ->limit($per_page,$per_row)
            ->get()
            ->result();

    }
    public function getAllOrderArray($select = '*',$where='1=1',$order_by ='',$type_order='DESC',$per_row = null,$per_page = null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->order_by($order_by,$type_order)
            ->limit($per_page,$per_row)
            ->get()
            ->result_array();

    }

    // lay ban ghi voi like
    public function getAllIn($select='*',$where='1=1',$field='',$per_row=null,$per_page=null)
    {
        return  $this->db->select($select)
            ->from($this->tbl_name)
            ->where_in($field,$where)
            ->limit($per_page,$per_row)
            ->get()
            ->result();
    }


    // huy session , nhan 1 mang hoac session rieng le
    public function unsetSession($array_session=null)
    {
        if(is_array($array_session) == true && $array_session != null)
        {
            foreach($array_session as $s_arr_session)
            {
                unset($_SESSION[$s_arr_session]);
            }
        }else if($array_session != null)
        {
            unset($_SESSION[$array_session]);
        }
    }

    // kiem tra su ton tai , nhan vao mot mang dieu kien
    public function checkExist($select='*',$where='1=1')
    {
        $query = $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->count_all_results();
        if($query >0 && $query != "")
           return $this->createNotify('success','Có tồn tại');
        else
            return $this->createNotify('error','Không tồn tại');
    }

    // them moi ban ghi
    public function insertRecord($where)
    {
        $check_exist = $this->checkExist('*',$this->field_check);
        if($check_exist['type'] == "success")
        {
            return $this->createNotify('error','Không thêm được vì bản ghi đã tồn tại');
        }else
        {
            $this->db->insert($this->tbl_name,$where);
            $status = $this->db->affected_rows();
            if($status > 0 && $status != "")
               return $this->createNotify('success','Thêm bản ghi thành công');
            else
                return $this->createNotify('error','Không thêm được bản ghi');

        }
    }

    public function updateRecord($where='1=1',$data=null,$field='')
    {
        $check_exist = $this->checkExist('*',$this->field_check);
        if($check_exist['type'] == 'success')
        {
            return $this->createNotify('error','Tên tương tự đã tồn tại bạn đổi tên khác');
        }else
        {

                $this->db->where($field,$where)
                    ->update($this->tbl_name,$data);
                $status = $this->db->affected_rows();
                if($status > 0 && $status != "")
                    return $this->createNotify('success','Sửa bản ghi thành công');
                else
                    return $this->createNotify('error','Sửa thất bại');
        }
    }
    public function updateNormal($where='1=1',$data=null,$field='')
    {
        $this->db->where($field,$where)
            ->update($this->tbl_name,$data);
        $status = $this->db->affected_rows();
        if($status >0 && $status != "")
        {
            return array(
              'type' => 'success',
                'mess' => 'Sửa thành công'
            );
        }else
        {
            return array(
                'type' => 'error',
                'mess' => 'Sửa thất bại'
            );
        }
    }
    public function updateRecordIn($where='1=1',$data=null,$field='')
    {

        $this->db->where_in($field,$where)
            ->update($this->tbl_name,$data);
        $status = $this->db->affected_rows();
        if($status > 0 && $status != "")
            return $this->createNotify('success','Sửa bản ghi thành công');
        else
            return $this->createNotify('error','Sửa thất bại');
    }

    public function deleteRecord($field,$where)
    {
        if(is_array($where) == true)
        {
            $this->db->where_in($field,$where)
                ->delete($this->tbl_name);
            $status = $this->db->affected_rows();
            if($status > 0 && $status != "")
                return $this->createNotify('success','Xóa '.$status.' bản ghi thành công');
            else
                return $this->createNotify('error','Xóa thất bại');
        }else
        {
            $this->db->where($field,$where)
                ->delete($this->tbl_name);
            $status = $this->db->affected_rows();
            if($status > 0 && $status != "")
                return $this->createNotify('success','Xóa bản ghi thành công');
            else
                return $this->createNotify('error','Xóa thất bại');

        }
    }

    public function viewDetail($select='*',$where='1=1')
    {
        return $this->db->select($select)
            ->from($this->tbl_name)
            ->where($where)
            ->get()
            ->row();

    }

    public function insertMutil($data)
    {
        $this->db->insert_batch($this->tbl_name,$data);
    }

    // cac cau lenh in va not in

}