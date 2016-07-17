<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    /**
     * 模板显示 调用内置的模板引擎显示方法，
     * @access protected
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @param string $charset 输出编码
     * @param string $contentType 输出类型
     * @param string $content 输出内容
     * @param string $prefix 模板缓存前缀
     * @return void
     */
    protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
    	$myContent = $this->view->fetch($templateFile,$content,$prefix);

    	//echo $myContent;
    	//exit;
    	//查找$myContent中包含有MAP_ATTRIBUTE_NAME属性的节点，根据登录人员的权限来判断是否删除此节点。
    	require './ThinkPHP/Library/Org/simple_html_dom.php';
    	$html_dom = str_get_html($myContent);
    	foreach($html_dom->find('['.C('MAP_ATTRIBUTE_NAME').']') as $element)
    	{
       		//$element->outertext = 'dd';
       		$element->perms_map = null;
       		//var_dump($element);
       		//exit;
       		//echo $element->plaintext;
       		//exit;
    	}
       	
        $this->show($html_dom,$charset,$contentType,$prefix);
        $html_dom->clear();
    }
    protected function ajaxret($data = array())
    {
		$this->ajaxReturn($data, '', JSON_UNESCAPED_UNICODE);
    }
}

class PermissionMapNode{

	private $Name;	//节点名称

	private $Path;	//节点路径

	private $ItemList;	//当前节点的权限

	private $Children;	//子节点

	private $Parent;		//父节点

	public function __get($property_name)
	{
		if(isset($this->$property_name))
		{
			if($property_name=='Path')
			{
				if (isset($this->Parent))
                    return $this->Parent->Path."/".$this->Name;
                return $this->$property_name;
			}
			else
			{
				return $this->$property_name;
			}
		}
		else
		{
			return null;
		}
	}
	public function __set($property_name, $value)
	{
		$this->$property_name = $value;
	}

	//定义一个构造方法初始化赋值  
    public function __construct($name,$itemList,$children,$parent) {  
        $this->Name=$name;  
        $this->ItemList=$itemList;
        $this->Children=$children;
        $this->Parent=$parent;
    }
	/**
	 * 创建权限树
	 * @param [type] $templateDirectories 模版目录
	 */
	public static function Create($templateDirectories)
	{
		$roleList;
		$templateFiles=getDir($templateDirectories);
		foreach($templateFiles as $templateFile)
    	{
       		$templateContent = file_get_contents($templateFiles);
       		$html_dom = str_get_html($templateContent);
       		foreach($html_dom->find('[perms_map]') as $element)
	    	{
	       		$roleMap = $element->perms_map;
	       		$maps = explode(',',$roleMap);
	       		foreach ($maps as $map)
                {
                    $roleList[]=$map;
                }
	    	}
    	}
    	$mapNodeList;
        foreach ($roleList as $item)
        {
        	//分隔perms-map，且找出最终节点，将role加入到最终节点的RoleList中
        	Find(explode('/',$item), null, $mapNodeList)->$ItemList[]=$item;
        }
        
        return $mapNodeList;
	}

	/**
	 * 寻找权限树节点
	 * @param [type] $mapList     [description]
	 * @param [type] $parent      [description]
	 * @param [type] $mapNodeList [description]
	 */
	static function Find($mapList, $parent, &$mapNodeList)
    {
        /*
         * 处理逻辑：
         * mapList代表perms-map分隔【/】符号后的列表，如："因公出访/团组资料/保存团组" = {"因公出访","团组资料","保存团组"}
         * 先找出第一个节点，查看该节点是否存在，无则新建节点
         * 若该节点为最后节点则返回该节点
         */
        $mapItem = $mapList[0];
        $mapList=array_splice($mapList,0,1);
        $mapNode = null;
        foreach($mapNodeList as $item)
    	{
    		if($item->Name == $mapItem)
    		{
    			$mapNode=$item;
    		}
    	}
        if ($mapNode == null)
        {
            $mapNode = new PermissionMapNode($mapItem,null,null,$parent);
            $mapNodeList[]=$mapNode;
        }
        if (count($mapList) == 0)
            return $mapNode;
        return this->Find($mapList, $mapNode, $mapNode->Children);
    }

    /**
     * 将 PermissionMapNode.Create 返回的结果转换成 jsTree 需要的数据集合
     * {
     *     id,
     *     text,
     *     parent,
     *     hasRole - 用于判断节点是否含有权限
     * }
     * @param [type] $nodeList [description]
     * @param [type] &$list    [description]
     */
    public static function ConvertToTreeData($nodeList, &$list)
    {
        foreach ($nodeList as $node)
        {
        	$list[]=array('id' => $node->Path,'text' => $node->Name,'parent' => $node->Parent == null ? "#" : $node->Parent->Path,'hasRole' => count($node->Path)>0 );
            this->ConvertToTreeData($node->Children, $list);
        }
    }
}