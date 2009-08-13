package
{
	import org.papervision3d.materials.MovieAssetMaterial;
	import org.papervision3d.materials.utils.MaterialsList;
	import org.papervision3d.objects.primitives.Cube;
	import org.papervision3d.view.BasicView;

	[SWF( width="900", height="400", frameRate="24", backgroundColor="#FFFFFF" )]
	
	public class Cube extends BasicView
	{
		public function Cube()
		{
			init();
		}
		
		private function init():void
		{
			var materials:MaterialsList = new MaterialsList({
				front:	new MovieAssetMaterial( 'front', 	false, true ),
				back:	new MovieAssetMaterial( 'back', 	false, true ),
				left:	new MovieAssetMaterial( 'left', 	false, true ),
				right:	new MovieAssetMaterial( 'right', 	false, true ),
				top:	new MovieAssetMaterial( 'top', 		false, true ),
				bottom:	new MovieAssetMaterial( 'bottom', 	false, true )
			});
			var cube:org.papervision3d.objects.primitives.Cube = new org.papervision3d.objects.primitives.Cube( materials, 300, 300, 9, 9, 9 );
			
			scene.addChild( cube );
		}
	}
}