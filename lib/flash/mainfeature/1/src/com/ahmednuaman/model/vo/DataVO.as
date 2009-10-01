package com.ahmednuaman.model.vo
{
	public class DataVO
	{
		public var xmlFolder:String								= 'assets/xml/';
		public var xmlMainfeature:String						= xmlFolder + 'mainfeature.xml';
		
		public var resourcesToLoad:Array						= [ xmlMainfeature ];
		
		public var resourcesData:Object;
	}
}