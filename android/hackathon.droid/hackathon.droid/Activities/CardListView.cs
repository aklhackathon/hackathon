using Android.App;
using Android.OS;
using hackathon.droid.ListAdapters;
using hackathon.droid.Services.Concrete;
using System;

namespace hackathon.droid.Activities
{
	[Activity(Label = "Bla")]
    public class CardListView : Activity
    {
        protected async override void OnCreate(Bundle bundle)
        {

			try {
				base.OnCreate(bundle);
				SetContentView(Resource.Layout.card_list_view);

				var cardAdapter = new CardListAdapter ();

				var gamePlayService = new GamePlayService ();
				var result = await gamePlayService.GetGamePlay ();

				if (result != null) {
				}
			}
			catch(Exception ex) {
				throw;
			}
            

        }
    }
}