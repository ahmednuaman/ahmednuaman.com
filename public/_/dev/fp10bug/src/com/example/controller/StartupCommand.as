package com.example.controller
{
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.patterns.command.MacroCommand;

	public class StartupCommand extends MacroCommand implements ICommand
	{
		public function StartupCommand()
		{
			addSubCommand( ModelCommand );
			addSubCommand( ViewCommand );
		}
	}
}