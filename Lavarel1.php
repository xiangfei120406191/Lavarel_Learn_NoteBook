<?php
// 1. 根据access_token 取得其中的用户信息
	$user_id = ResourceServer::getOwnerId();
	$user = User::find( $user_id );
	$store = $user->stores->first();
// 2.返回json 数据输出到浏览器
	return Response::json(
				array(
					'error' => false,
					'categories' => $categories->lists( 'category_baseinfo' )
				),
				200
			);
//  3.从数据库根据 某种条件 取出数据
	return Category::where( 'store_id', '=', $conditions["store_id"])->orderBy( 'sequence' )->get();
// 4. 软删除的操作步骤
	use Illuminate\Database\Eloquent\SoftDeletingTrait；
	class User extends Eloquent
	{
		use SoftDeletingTrait;
		protected $dates = ['deleted_at'];
	}
	//需要确保数据库中有deleted_at 字段
// 5. 修改数据库表的结构
      //在项目的根目录下 运行 命令
	  php artisan migrate:make create_users_table
	  //创建了一个迁移文件，名字为时间+create_users_table，生成在database/migratations文件夹下
		class Ssssssss extends Migration {

			public function up()
			{
				//
			}

			public function down()
			{
				//
			}
		}
		//在up down 添加相应的方法 修改数据库表的结构
			public function up()
			{
				Schema::create('users', function($table)
				{
					$table->increments('id');
					$table->string('email')->unique();
					$table->string('name');
					$table->timestamps();
				});
			}

			public function down()
			{
				Schema::drop('users');
			}
		//然后执行 使修改生效
		php artisan migrate
		
// 6.取得这样的输入数据的方法
		 "category":
			{
				"category_name" : "洗发水",
				"products" : [
					{
						"id" : 1
					},
					{
						"id" : 2
					},
					{
						"id" : 3
					}
				]
			}
			
		$input = json_decode(Input::get('category'));
		$category_name = $input->category_name;
		foreach ( $input->products as $product ) 
		{
			$product_id = $product->id;
		}
// 7. 关联查询Product 与 category 是关联表
			//建立关联关系
           public function category() 
			{
				return $this->belongsTo('PomeMartDomainModel\Entities\Category');
			} 
			//使用关联关系
			"category" => $this->category,
			"tags" => $this->tags->lists('tagInfo')，
// 8.取得自定义属性 通过 关联表查询的数据
		$product->product_info['is_inventory_short'];
		//product_info 是获取器
		public function getproductInfoAttribute()
		{
			return array(
				"id" => $this->id,
				"is_inventory_short" => $is_inventory_short,
				"tags" => $this->tags->lists('tagInfo')
			);
		}
		
    
?>