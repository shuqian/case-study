-- 分类的测试数据

CREATE TABLE `shop_catalog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_catalog`
--

INSERT INTO `shop_catalog` VALUES (8,0,'精品女装','精品女装 欧美女装 淘宝爆款服饰','2016年热销爆款精品时尚女装，满99元包邮，当天发货！不满意支持退款！','0,'),(9,0,'美妆护肤','2016美妆护肤品牌','2016年热销护肤品牌排行榜，淘宝经典畅销热卖产品。面膜、润手霜、面霜、遮瑕膏...','0,'),(10,0,'时尚包包','新2016年时尚包包','2016年时尚包包产品描述','0,'),(11,0,'潮流美鞋','2016潮流美鞋','2016潮流美鞋产品描述','0,'),(14,0,'韩日配饰','2016韩日配饰','2016韩日配饰分类描述','0,'),(16,10,'手提包包','New女士手提包包','New女士手提包包描述','0,10,'),(17,16,'新款','热卖畅销新款手提包包','新款手提包包产品描述','0,10,16,'),(18,16,'经典手提包包','经典手提包包推荐热卖款','经典手提包包产品描述','0,10,16,'),(27,10,'精品男包','精品男包 - iSHOP时尚电商官网','精选麦包包  男包！如何挑选麦包包流行女包、精品男包、功能箱包？ 买包包？麦包包！ 全场顺丰快递，支持货到付款！','0,10,'),(30,27,'钱包手包','男士钱包手包','钱包手包描述','0,10,27,'),(31,11,'休闲鞋','休闲鞋 帆布鞋 运动鞋','休闲鞋分类','0,11,'),(32,31,'帆布鞋','2016时尚帆布鞋','帆布鞋以其轻便，耐穿，价格 低廉而广受世界各地人们的欢迎，无论是 出游或 运动，都会是最佳的选择之一。帆布鞋在中国出现已有很长历史。从最早的帆布鞋、 解放胶鞋到迷你 彩绘帆布鞋、 运动休闲帆布鞋、高筒帆布鞋。','0,11,31,'),(33,31,'板鞋','我的滑板鞋','滑板鞋描述','0,11,31,'),(34,11,'女鞋','2016时尚女鞋','分类','0,11,'),(35,34,'高帮鞋','2016高帮鞋','高帮鞋分类描述','0,11,34,'),(36,34,'金属铆钉','金属铆钉','金属铆钉描述','0,11,34,'),(37,34,'糖果色','糖果色','糖果色描述','0,11,34,'),(38,14,'首饰','饰品首饰佩戴','饰品描述','0,14,'),(39,38,'戒指','戒指','戒指','0,14,38,'),(40,38,'项链','项链','项链','0,14,38,'),(41,38,'手链','手链','手链','0,14,38,'),(42,38,'耳环','耳环','耳环','0,14,38,'),(43,38,'耳钉','耳钉','耳钉','0,14,38,'),(44,14,'发饰','发饰','发饰','0,14,'),(45,44,'假发','假发','假发','0,14,44,'),(46,44,'头饰','头饰','头饰','0,14,44,'),(49,44,'头箍','头箍','头箍','0,14,44,'),(55,34,'高跟鞋','鞋子女鞋','高跟鞋描述','0,11,34,'),(57,9,'护肤','护肤','护肤','0,9,'),(58,57,'洁面','洁面','洁面','0,9,57,'),(59,57,'面霜','面霜','面霜','0,9,57,'),(60,57,'精华','精华','精华','0,9,57,'),(61,57,'眼霜','眼霜','眼霜','0,9,57,'),(62,9,'彩妆','彩妆','彩妆','0,9,'),(63,62,'防晒','防晒','防晒','0,9,62,'),(64,62,'眼影','眼影','眼影','0,9,62,'),(65,62,'睫毛膏','睫毛膏','睫毛膏','0,9,62,'),(66,62,'腮红','腮红','腮红','0,9,62,'),(67,8,'上衣','上衣','上衣','0,8,'),(68,67,'T恤','T恤','T恤','0,8,67,'),(69,67,'衬衫','','','0,8,67,'),(70,67,'背心','','','0,8,67,'),(71,8,'裙子','','','0,8,'),(72,71,'短裙','','','0,8,71,'),(73,71,'连衣裙','','','0,8,71,'),(74,71,'牛仔裙','','','0,8,71,'),(75,8,'裤子','','','0,8,'),(76,75,'休闲裤','','','0,8,75,'),(77,75,'背带裤','','','0,8,75,'),(78,75,'牛仔裤','','','0,8,75,');