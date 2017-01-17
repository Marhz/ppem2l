<nav class="navbar navbar-default navbar-menuright col-lg-3 sidebar">
    <div class="">
        <table class="table-condensed table-bordered table-striped col-xs-3">
                <thead>
                    <tr>
                      <th colspan="7">
                        <a class="btn"><i class="icon-chevron-left"></i></a>
                        <a class="btn">February 2012</a>
                        <a class="btn"><i class="icon-chevron-right"></i></a>
                      </th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                </tbody>
            </table>
    </div>
        <div class="moncompte">
            <div class="col-xs-4 col-lg-12">
                <h3>Mon compte</h3>
                <p>Bienvenue <?= auth('prenom').' '.auth('nom'); ?></p>
                <p>Il vous reste <?= auth('credit'); ?> crédits</p>
            </div>
            <div class="col-xs-4 col-lg-12">
                <h3>Mes formations</h3>
                <p>Vous n'avez pas de formation à venir</p>
                <p>Vous avez $nbrf le $fdate</p>
                <p>Il vous reste $nbr_jour jours de formation</p>
            </div>
        </div> 
    </nav>