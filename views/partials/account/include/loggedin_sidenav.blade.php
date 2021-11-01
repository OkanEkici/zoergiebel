
            <!-- Nav -->
            <nav class="mb-10 mb-md-0">
              <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('account.edit') }}">
                  Daten bearbeiten
                </a>
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('account.orders') }}">
                  Bestellungen
                </a>
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('account.wishlist') }}">
                  Wunschliste
                </a>
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('account.addresses') }}">
                  Adressen
                </a>
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
              </div>
            </nav>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
						