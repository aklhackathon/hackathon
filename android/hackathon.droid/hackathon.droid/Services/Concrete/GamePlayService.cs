using System;
using System.IO;
using System.Threading.Tasks;
using hackathon.droid.Models.Cards;
using hackathon.droid.Services.Interface;
using Newtonsoft.Json;

namespace hackathon.droid.Services.Concrete
{
    public class GamePlayService : IGamePlayService
    {
        public async Task<GamePlayRoot> GetGamePlay()
        {
            string json;
            var baseDirectory = Directory.GetCurrentDirectory().Substring(0, (Directory.GetCurrentDirectory().IndexOf(@"hackathon.test\bin\Debug", StringComparison.Ordinal))); ; // Get the current working directory
            var jsonPath = baseDirectory + @"hackathon.droid/Services/DAL/card-data.txt";
            using (var stream = new StreamReader(jsonPath))
            {
                json = await stream.ReadToEndAsync();
            }
            return string.IsNullOrEmpty(json) ? new GamePlayRoot() : JsonConvert.DeserializeObject<GamePlayRoot>(json);
        }
    }
}
