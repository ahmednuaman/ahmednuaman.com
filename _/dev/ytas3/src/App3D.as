package
{
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.utils.MaterialsList;
	import org.papervision3d.objects.primitives.Cube;
	import org.papervision3d.view.BasicView;

	public class App3D extends BasicView
	{
		var cube:Cube;
		var materials:MaterialsList;
		
		public function App3D()
		{
			super( 640, 480, true, true, CameraType.TARGET );
			
			init();
		}
		
		private function init():void
		{
			materials = new MaterialsList();
			
			for ( var i:Number = 0; i < 6; i++ )
			{
				
			}
		}
	}
}